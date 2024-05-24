base_path="/var/www/html"
input="/plugins.txt"

if [  -d "$1" ]; then
    base_path=$1
fi
if [  -f "$2" ]; then
    input=$2
fi

while IFS= read -r line
do
  if [ -z "$line" ]
  then
        echo "\$line is empty - no download available. Continue to next downloading. "
  else
        echo "Downloading plugin from : $line"
        curl -fLo temp.zip $line
        echo "Unzipping plugin from : $line"
        unzip temp.zip -d ${base_path}/wp-content/plugins/
        rm temp.zip
  fi
done < "$input"
