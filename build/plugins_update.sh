#!/bin/bash
input_file="plugins.txt"
temp_file="plugins_updated.txt"

# Vérifier que jq est installé
if ! command -v jq &> /dev/null; then
    echo "Le script nécessite 'jq'. Veuillez l'installer (ex: brew install jq ou sudo apt-get install jq) et réessayer."
    exit 1
fi

# Vider le fichier temporaire
> "$temp_file"

# Lecture du fichier plugins.txt ligne par ligne
while IFS= read -r url; do
    # Ignorer les lignes vides
    if [[ -z "$url" ]]; then
        continue
    fi

    filename=$(basename "$url")
    # Retirer l'extension .zip pour obtenir "slug.version"
    base="${filename%.zip}"

    # Extraire la version : le motif est composé d'au moins deux nombres séparés par des points, éventuellement plus
    current_version=$(echo "$base" | grep -Eo '[0-9]+(\.[0-9]+)+$')
    # Extraire le slug en supprimant la partie version
    slug=$(echo "$base" | sed -E "s/\.[0-9]+(\.[0-9]+)+$//")

    if [[ -z "$slug" || -z "$current_version" ]]; then
        echo "Erreur d'extraction pour $filename"
        echo "$url" >> "$temp_file"
        continue
    fi

    echo "Traitement du plugin : $slug"
    echo "Version actuelle : $current_version"

    # Interroger l'API WordPress pour obtenir les infos du plugin
    json=$(curl -s "https://api.wordpress.org/plugins/info/1.0/${slug}.json")
    # Vérifier que la réponse JSON est valide avant de l'analyser avec jq
    if echo "$json" | jq empty 2>/dev/null; then
        latest_version=$(echo "$json" | jq -r '.version')
    else
        echo "Erreur : réponse JSON invalide pour le plugin $slug"
        latest_version=""
    fi

    echo "Version récupérée depuis l'API : $latest_version"

    if [[ -z "$latest_version" || "$latest_version" == "null" ]]; then
        echo "Aucune version récupérée, on conserve l'URL d'origine."
        echo "$url" >> "$temp_file"
    else
        new_url="https://downloads.wordpress.org/plugin/${slug}.${latest_version}.zip"
        echo "Nouvelle URL : $new_url"
        echo "$new_url" >> "$temp_file"
    fi

    echo "----------------------------------------"
done < "$input_file"

# Remplacer le fichier original par la version mise à jour
mv "$temp_file" "$input_file"
echo "Le fichier $input_file a été mis à jour."

# Vérification que chaque URL retourne un code HTTP 200
echo "Vérification des URLs mises à jour :"
while IFS= read -r url; do
    http_code=$(curl -o /dev/null -s -w "%{http_code}" "$url")
    if [[ "$http_code" -eq 200 ]]; then
        echo "$url : OK (HTTP $http_code)"
    else
        echo "$url : Erreur (HTTP $http_code)"
    fi
done < "$input_file"
