# 🎯 Laravel Quiz Platform

Une plateforme de quiz développée avec **Laravel** (PHP) et **Bootstrap**, permettant aux utilisateurs de s'inscrire, se connecter, créer des quiz et y répondre.

---

## 🚀 Fonctionnalités

- Authentification complète (enregistrement, connexion, déconnexion)
- Création de quiz avec titre et description
- Liste des quiz disponibles
- Ajout de questions avec réponses
- Réalisation de quiz avec résultats immédiats
- Interface responsive grâce à Bootstrap

---

## 🛠️ Technologies utilisées

- [Laravel 12.x](https://laravel.com/)
- PHP 8.x
- SQLite (base de données simple et portable)
- Bootstrap 5
- Blade (système de templates Laravel)
- Git + GitHub

---

## ⚙️ Installation locale

```bash
git clone https://github.com/ton-utilisateur/quiz-platform.git
cd quiz-platform
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
php artisan serve
