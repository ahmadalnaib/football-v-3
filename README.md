# ⚽ Foota.ai

**Foota.ai** is an AI-powered platform that analyzes football matches, generates win probabilities, and provides smart match insights. Whether you're a casual fan or a serious analyst, Foota helps you stay ahead with data-driven predictions and real-time updates.

> 🌍 Visit the app: [https://foota.ai](https://foota.ai)

---

## 🔮 Key Features

- 📊 AI-based win probability for each team
- 📅 Weekly match results from major leagues
- 🧠 Smart match insights and analysis
- 🌐 Multi-language support (English, Arabic, etc.)
- 🏆 Supports UEFA, Bundesliga, Premier League, and more
- ❤️ Bookmark matches you care about
- 📱 Fully responsive & mobile-friendly

---

## ⚙️ Tech Stack

### Frontend

- Vue.js / Inertia.js
- Tailwind CSS
- Vite
- Multi-language (i18n)
- Dark mode UI

### Backend

- Laravel 10+ (API & SSR)
- AI-powered prediction engine (custom logic or OpenAI)
- MySQL
- Queue, Cron, and Cache optimization

### Hosting

- DigitalOcean (Droplet)
- NGINX + PHP-FPM
- GitHub + FileZilla (for deploy)

---

## 🚀 Getting Started

### 1. Clone the Repository

```bash
git clone https://github.com/ahmadalnaib/foota-ai.git
cd foota-ai
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run dev
php artisan serve

