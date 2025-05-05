<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
</head>
<body>
  <h1>📰 Online News Portal</h1>

  <p>The <strong>Online News Portal</strong> is a dynamic web-based application built with <strong>Laravel</strong> that allows administrators to publish news articles and readers to stay informed on current events. It includes category-based news browsing, an admin panel for content management, and a responsive user interface.</p>

  <h2>🚀 Features</h2>
  <ul>
    <li>Frontend news display with categories (Politics, Sports, Tech, etc.)</li>
    <li>Admin dashboard to manage articles, categories, tags, and users</li>
    <li>User authentication and role management (Admin, Editor, Reader)</li>
    <li>Image upload and article rich-text editing</li>
    <li>Search functionality and article filters</li>
    <li>SEO-friendly URLs and article slugs</li>
    <li>Responsive layout for mobile and desktop</li>
  </ul>

  <h2>🛠️ Tech Stack</h2>
  <ul>
    <li><strong>Backend:</strong> Laravel (PHP)</li>
    <li><strong>Frontend:</strong> Blade templates, HTML, CSS, JavaScript</li>
    <li><strong>Database:</strong> MySQL</li>
    <li><strong>Authentication:</strong> Laravel Breeze / Laravel UI</li>
    <li><strong>Image Handling:</strong> Laravel Storage</li>
    <li><strong>Tooling:</strong> Git, GitHub, Composer, Laravel Artisan CLI</li>
  </ul>

  <h2>⚙️ Installation</h2>
  <ol>
    <li>Clone the repository:
      <pre><code>git clone https://github.com/csemiraz/news-portal.git
cd online-news-portal</code></pre>
    </li>
    <li>Install dependencies:
      <pre><code>composer install
npm install && npm run dev</code></pre>
    </li>
    <li>Set up the environment:
      <pre><code>cp .env.example .env
php artisan key:generate</code></pre>
    </li>
    <li>Update your <code>.env</code> file with database and mail configurations.</li>
    <li>Run migrations:
      <pre><code>php artisan migrate</code></pre>
    </li>
    <li>(Optional) Seed initial data:
      <pre><code>php artisan db:seed</code></pre>
    </li>
    <li>Serve the application:
      <pre><code>php artisan serve</code></pre>
    </li>
    <li>Open in browser: <a href="http://localhost:8000">http://localhost:8000</a></li>
  </ol>

  <h2>🙌 Contributions</h2>
  <p>We welcome contributions from the open-source community. Feel free to fork the repo and submit pull requests with enhancements or bug fixes.</p>

  <h2>📄 License</h2>
  <p>This project is licensed under the <a href="LICENSE">MIT License</a>.</p>
</body>
</html>
