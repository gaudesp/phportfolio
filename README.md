# PHPortfolio 🎨💼

**PHPortfolio** est une application web type portfolio, développé en **PHP** avec un **mini-framework MVC** maison, utilisant PDO pour l'accès aux données et Bootstrap pour un design responsive.

## ⚙️ Prérequis
- **Docker** (*version* : `28.0.1`)
- **Docker Compose** (*version* : `2.33.1`)
- **PHP** (*version* : `7.4`)
- **MySQL** (*version* : `5.7`)
- Un **terminal** compatible **Bash** (*sur WSL ou Unix-like*)

> 💡 Optionnel, utilisez un environnement de développement local type XAMPP, WampServer ou Laravel Valet.

## 🚀 Setup
1. **Clonez le repo** :  
```bash
git clone git@github.com:gaudesp/phportfolio.git
cd phportfolio
```

2. **Lancez l'application avec Docker Compose** :
- Pour lancer l'application sans données préremplies :
```bash
docker compose up --build
```
- Pour lancer l'application avec des données initiales (seeds) :
```bash
SEEDS=true docker compose up --build
```

3. **Accédez à l'application localement** :
- APP accessible via : [http://127.0.0.1](http://127.0.0.1)
- phpMyAdmin (gestion de la base de données) : [http://localhost:8080](http://localhost:8080)

## 📦 Dépendances
- `Bootstrap 4` : Framework CSS pour la mise en page responsive.
- `PHPMailer` : Envoi et gestion des e-mails.
- `Google reCAPTCHA` : Protection du formulaire de contact.
- `PDO` : accès sécurisé à la base de données MySQL.

## 🤝 Contribution
Lead developer : [@gaudesp](https://github.com/gaudesp)
