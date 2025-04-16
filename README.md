# KickstartLaravel

KickstartLaravel is an open-source Laravel application that helps developers discover, search, and install various Laravel starter kits with ease.

Whether you're new to Laravel or a seasoned developer looking to quickly spin up a project, KickstartLaravel gives you access to a curated directory of boilerplates, scaffolding tools, and starter kits to accelerate your development workflow.

---

## 🚀 Features

- 🔍 Search for Laravel starter kits by keyword
- 📦 Install starter kits directly from the interface
- 🧱 Community-curated starter kit directory
- 🌐  Simple and clean UI built with Filament

---

## 🛠️ Installation

To run KickstartLaravel locally, follow the steps below:

### Requirements

- PHP 8.3+
- Composer
- Laravel 12.x
- Node.js and NPM/Yarn
- MySQL or SQLite

### Step-by-Step

1. **Clone the repository:**

   ```bash
   git clone https://github.com/interfaceable/kickstartlaravel.git
   cd kickstartlaravel
   ```

2. **Install PHP dependencies:**

   ```bash
   composer install
   ```

3. **Install JS dependencies:**

   ```bash
   npm install && npm run dev
   # or
   yarn install && yarn dev
   ```

4. **Copy the `.env` file and configure environment:**

   ```bash
   cp .env.example .env
   ```

   Update your `.env` with database credentials and other app config.

5. **Generate application key:**

   ```bash
   php artisan key:generate
   ```

6. **Run migrations (and seeders if available):**

   ```bash
   php artisan migrate
   ```

7. **Start the local development server:**

   ```bash
   php artisan serve
   ```

   Access the app at `http://127.0.0.1:8000`.

---

## 👥 Contributing

We welcome contributions from the community! Here’s how you can help:

### 🧑‍💻 Contribute Code

1. Fork the repository
2. Create a new branch for your feature or fix:
   ```bash
   git checkout -b feature/your-feature-name
   ```
3. Commit your changes with clear messages
4. Push to your fork:
   ```bash
   git push origin feature/your-feature-name
   ```
5. Create a Pull Request on the `main` branch

### ✅ Contribution Guidelines

- Use PSR-12 coding standards
- Use meaningful commit messages
- Ensure tests (if any) pass before submitting PRs
- For UI changes, ensure they are responsive and clean
- Document your changes when applicable

---

## 📄 License

This project is open-sourced under the [MIT license](LICENSE).

---

## 🤝 Acknowledgements

KickstartLaravel is made with ❤️ by contributors passionate about the Laravel ecosystem.

---

## 📫 Contact

Have a suggestion or issue? Feel free to open an [Issue](https://github.com/interfaceable/kickstartlaravel/issues) or reach out via a Pull Request!
