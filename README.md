# Basic Elementor Theme

Un thème WordPress moderne et minimaliste, compatible avec l'éditeur de blocs Gutenberg et Elementor.

## Description

Basic Elementor Theme est un thème WordPress flexible conçu pour fonctionner parfaitement avec les éditeurs de contenu modernes. Que vous préfériez utiliser l'éditeur de blocs natif de WordPress (Gutenberg) ou le constructeur de pages Elementor, ce thème vous offre une base solide et personnalisable.

## Fonctionnalités

- ✅ Compatible avec l'éditeur de blocs Gutenberg
- ✅ Compatible avec Elementor
- ✅ Design responsive et mobile-first
- ✅ Support des images à la une
- ✅ Support du logo personnalisé
- ✅ Zones de widgets (sidebar + 3 zones footer)
- ✅ 2 menus de navigation (principal et footer)
- ✅ Templates de page personnalisés
- ✅ Styles pour l'éditeur
- ✅ Support des alignements larges et pleine largeur
- ✅ Optimisé pour l'accessibilité
- ✅ Compatible RTL (Right-to-Left)
- ✅ Prêt pour la traduction
- ✅ Code propre et bien documenté

## Installation

### Installation standard

1. Téléchargez le thème
2. Dans votre tableau de bord WordPress, allez dans **Apparence > Thèmes**
3. Cliquez sur **Ajouter** puis **Téléverser un thème**
4. Sélectionnez le fichier ZIP du thème
5. Cliquez sur **Installer maintenant**
6. Activez le thème

### Installation manuelle

1. Téléchargez et décompressez le thème
2. Téléversez le dossier du thème dans `/wp-content/themes/`
3. Activez le thème depuis le menu **Apparence > Thèmes**

## Configuration

### Menus

Le thème supporte deux emplacements de menu :

1. **Menu principal** : Affiché dans l'en-tête du site
2. **Menu footer** : Affiché dans le pied de page

Pour configurer vos menus :
- Allez dans **Apparence > Menus**
- Créez un nouveau menu ou modifiez un existant
- Assignez-le à l'emplacement souhaité

### Zones de widgets

Le thème propose 4 zones de widgets :

1. **Sidebar** : Barre latérale affichée sur les articles et pages (sauf template pleine largeur)
2. **Footer 1, 2, 3** : Trois colonnes dans le pied de page

Pour ajouter des widgets :
- Allez dans **Apparence > Widgets**
- Glissez-déposez vos widgets dans les zones souhaitées

### Logo et identité du site

Pour personnaliser le logo et les informations du site :
- Allez dans **Apparence > Personnaliser > Identité du site**
- Téléversez votre logo
- Modifiez le titre et la description du site

### Personnalisation

Le thème offre plusieurs options de personnalisation :

1. **Couleurs du thème**
   - Couleur principale : Modifie la couleur des liens et éléments principaux

2. **Options de mise en page**
   - Largeur du conteneur : Ajustez la largeur maximale du contenu (960px - 1920px)

3. **Options du pied de page**
   - Texte de copyright personnalisé

Accédez à ces options via **Apparence > Personnaliser**

## Templates de page

Le thème inclut deux templates de page personnalisés :

### 1. Full Width (Pleine largeur)
- Sans sidebar
- Largeur maximale pour le contenu
- Idéal pour les pages avec Elementor ou contenu large

**Utilisation :**
1. Créez ou éditez une page
2. Dans les attributs de la page (panneau de droite)
3. Sélectionnez "Full Width (No Sidebar)" dans le menu "Modèle"

### 2. Elementor Canvas
- Sans en-tête ni pied de page
- Canvas vierge pour Elementor
- Parfait pour les landing pages

**Utilisation :**
1. Créez ou éditez une page
2. Dans les attributs de la page
3. Sélectionnez "Elementor Canvas"

## Utilisation avec Elementor

Le thème est entièrement compatible avec Elementor :

1. Installez et activez le plugin Elementor
2. Créez une nouvelle page
3. Cliquez sur "Modifier avec Elementor"
4. Commencez à construire votre page

**Recommandations :**
- Utilisez le template "Full Width" pour les pages Elementor standard
- Utilisez le template "Elementor Canvas" pour les landing pages sans en-tête/pied de page
- Le thème supporte tous les widgets Elementor natifs
- Compatible avec Elementor Pro

## Utilisation avec l'éditeur de blocs

Le thème supporte toutes les fonctionnalités de l'éditeur de blocs :

- ✅ Alignements larges et pleine largeur
- ✅ Styles d'éditeur (ce que vous voyez dans l'éditeur ressemble au frontend)
- ✅ Tous les blocs natifs de WordPress
- ✅ Blocs réutilisables
- ✅ Patterns de blocs

## Structure des fichiers

```
basic-elementor-theme/
├── assets/
│   ├── css/
│   │   ├── editor-style.css      # Styles pour l'éditeur
│   │   └── main.css               # Styles additionnels
│   ├── js/
│   │   ├── customizer.js          # Scripts du customizer
│   │   └── navigation.js          # Scripts de navigation
│   └── images/                    # Images du thème
├── inc/
│   ├── customizer.php             # Configuration du customizer
│   └── template-tags.php          # Fonctions de template
├── page-templates/
│   ├── elementor-canvas.php       # Template canvas
│   └── full-width.php             # Template pleine largeur
├── archive.php                    # Template des archives
├── comments.php                   # Template des commentaires
├── footer.php                     # Pied de page
├── functions.php                  # Fonctions du thème
├── header.php                     # En-tête
├── index.php                      # Template principal
├── page.php                       # Template des pages
├── searchform.php                 # Formulaire de recherche
├── sidebar.php                    # Barre latérale
├── single.php                     # Template des articles
├── style.css                      # Feuille de style principale
└── README.md                      # Ce fichier
```

## Compatibilité

- **WordPress** : 5.9 ou supérieur
- **PHP** : 7.4 ou supérieur
- **Navigateurs** : Chrome, Firefox, Safari, Edge (dernières versions)

## Support et plugins recommandés

### Plugins recommandés
- **Elementor** : Constructeur de pages (gratuit)
- **Elementor Pro** : Version premium avec plus de widgets (payant)
- **Contact Form 7** : Formulaires de contact
- **Yoast SEO** : Optimisation SEO
- **WP Rocket** : Cache et optimisation des performances

### Support
Pour toute question ou problème :
1. Consultez la documentation WordPress officielle
2. Visitez les forums de support WordPress
3. Contactez votre développeur web

## Personnalisation avancée

### Fichier CSS enfant
Pour des personnalisations CSS avancées, créez un thème enfant :

1. Créez un nouveau dossier dans `/wp-content/themes/`
2. Nommez-le `basic-elementor-theme-child`
3. Créez un fichier `style.css` avec :

```css
/*
Theme Name: Basic Elementor Theme Child
Template: basic-elementor-theme
*/

/* Vos styles personnalisés ici */
```

4. Créez un fichier `functions.php` :

```php
<?php
function child_theme_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'child_theme_enqueue_styles');
```

5. Activez le thème enfant

### Hooks disponibles
Le thème utilise les hooks WordPress standard. Vous pouvez les utiliser dans votre thème enfant ou dans un plugin.

## Crédits

- Développé avec ❤️ pour la communauté WordPress
- Police système par défaut pour de meilleures performances
- Icons : Emojis Unicode

## Licence

Ce thème est sous licence GNU General Public License v2 or later.

## Changelog

### Version 1.0.0
- Version initiale
- Support Gutenberg complet
- Support Elementor complet
- Design responsive
- 2 templates de page personnalisés
- 4 zones de widgets
- Options de personnalisation

---

**Merci d'utiliser Basic Elementor Theme !** 🎉
