<footer>
    <div class="footer-container">
        <div class="footer-section">
            <div>
                <p class="section-title"><?php echo get_bloginfo( 'name' ); ?></p>
            </div>
            <div>
                <p class="description">
                    <?php echo get_bloginfo( 'description' ); ?>
                </p>
            </div>
        </div>
        <div class="footer-section">
            <div>
                <p class="section-title">Contact</p>
            </div>
            <div class="sitemap">
                <a href="#">Formulaire de contact</a>
                <a href="mailto:<?php echo get_bloginfo( 'admin_email' ); ?>"><?php echo get_bloginfo( 'admin_email' ); ?></a>
            </div>
        </div>
        <div class="footer-section">
            <div>
                <p class="section-title">À propos</p>
            </div>
            <div class="sitemap">
                <a href="#">Politique de confidentialité</a>
                <a href="#">Mentions légales</a>
                <a href="#">CGU</a>
                <a href="#">Charte cookies</a>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
