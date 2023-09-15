<h1 align="center" id="title">Personal Finance</h1>

<p id="description">

The Finance Tracker App is a web application for managing your financial transactions, visualizing financial data, and setting and monitoring budgets. This README provides an overview of the application, its features, and how to set it up using Laravel Sail.
</p>


<h2>🧐 Features</h2>

Here're some of the project's best features:

*   Transaction Management: Easily record income and expenses with details such as date amount and description.
*   Data Visualization: Visualize your financial data using charts and graphs to gain insights into your financial health.
*   Budget Tracking: Set budgets for different categories and track your spending against these budgets.

## Prerequisites

Before you begin, ensure you have met the following requirements:

- **Docker**: Install Docker on your system if you haven't already.

- **Composer**: Install Composer, a PHP dependency manager, if you haven't already.


<h2>🛠️ Installation Steps:</h2>

<p>1. Clone the Repository: Clone this repository to your local machine:</p>

```
git clone https://github.com/yourusername/finance-tracker.git
```

<p>2. Navigate to the Project Directory: Change your working directory to the project folder:</p>

```
cd finance-tracker
```

<p>3. Install Composer Dependencies: Install PHP dependencies using Composer:</p>

```
composer install
```

<p>4. Copy Environment Variables: Copy the .env.example file to .env:</p>

```
cp .env.example .env
```

<p>5. Start Laravel Sail: Start Laravel Sail and the Docker containers:</p>

```
./vendor/bin/sail up -d
```

<p>6. Generate Application Key: Generate the application key:</p>

```
./vendor/bin/sail artisan key:generate
```

<p>7. Run Migrations: Run the database migrations to set up the database schema:</p>

```
./vendor/bin/sail artisan migrate
```

<p>8. Access the Application: You can access the application at http://localhost.</p>

<h2>🍰 Contribution Guidelines:</h2>

Contributions are welcome! If you'd like to contribute to this project please follow these guidelines: Fork the repository. Create a new branch for your feature or bug fix: shell Copy code git checkout -b feature/your-feature-name Make your changes and commit them: shell Copy code git commit -m "Add your commit message here" Push your changes to your fork: shell Copy code git push origin feature/your-feature-name Open a pull request to the main branch of this repository.

  
  
<h2>💻 Built with</h2>

Technologies used in the project:

*   Laravel
*   VueJS
*   Inertia
*   Tailwindcss

<h2>🛡️ License:</h2>

This project is licensed under the MIT License
