# Laravel Advanced CMS 

This project is a content management system (CMS) built with Laravel to manage content. It includes features such as user authentication, rich text editor integration, post management, categories, tags, and an admin panel for content moderation.

## Features

### Authentication
- **Login** ✅
- **Register** ✅

### Rich Text Editor
- **Integration of Rich Text Editor** ✅

### Posts
- **Add Post** ✅
- **View Posts** ✅
- **Display Tags in Posts** ✅
- **Edit Post** ✅
- **Delete Post (Post Author Only)** ✅
- **Add Comment** ✅
- **View Comments** ✅
- **Delete Comment (Comment Author Only)** ✅

### Category/Tag Display
- **View Posts by Category** ✅
- **View Posts by Tag** ✅

### Admin Panel
- **Odobravanje posta** ✅
- **Brisanje posta** ✅
- **Editovanje posta** ✅
- **Brisanje komentara** ✅
- **Prikazivanje svih postova** ✅
- **Editovanje i dodavanje kategorija/tagova** ✅
- **Upravljanje korisnicima (promjena role)** ✅

### Pages
- **Create Page** ✅
- **Edit Page** ✅
- **View Page** ✅
- **Delete Page** ✅

### Profile
- **View Posts of Profile** ✅
- **Latest Comments of Profile** ✅
- **Created Pages** ✅

### Editor
- **Add Editor** ✅
- **Display Edited Text** ✅

## Technologies Used
- **Laravel** (PHP Framework)
- **Tailwind CSS** (For styling)
- **Rich Text Editor** (For editing content)

## Setup Instructions

1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/advanced-cms.git
   ```

2. Navigate to the project directory:
   ```bash
   cd advanced-cms
   ```

3. Install dependencies:
   ```bash
   composer install
   ```

4. Set up your `.env` file by copying from `.env.example`:
   ```bash
   cp .env.example .env
   ```

5. Generate the application key:
   ```bash
   php artisan key:generate
   ```

6. Set up your database configuration in the `.env` file.

7. Run the migrations:
   ```bash
   php artisan migrate
   ```

8. Serve the application:
   ```bash
   php artisan serve
   ```

Visit `http://localhost:8000` in your browser to access the application.

## Contribution

Feel free to fork the repository, submit issues, or make pull requests.

## License

This project is open-source and available under the [MIT License](LICENSE).
