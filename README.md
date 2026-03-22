# CRMSMUSKAN - Multi-Domain Business Management Platform

A comprehensive business management system designed for credit repair agencies and financial service firms. CRMSMUSKAN integrates credit dispute resolution, financial operations, e-commerce capabilities, and workflow automation into a unified platform.

## 🚀 Features

### Core Domains

#### 📊 Credit Management
- **Creditor Management**: Track companies, addresses, and contact information
- **Dispute Resolution**: Categorized dispute reasons and instruction templates
- **Credit Bureau Integration**: Manage credit bureaus and freeze requests
- **Letter Generation**: Automated letter templates for dispute responses

#### 💰 Financial Operations
- **Invoice & Billing**: Complete invoicing system with line items and tax calculations
- **Purchase Management**: Vendor management, purchase orders, and accounts payable
- **Payment Tracking**: Customer and bill payments with reconciliation
- **Multi-Currency Support**: Exchange rate handling and currency references

#### 🛒 E-Commerce Module
- **Multi-Store Support**: Manage multiple online stores
- **Product Management**: Products with variants, categories, and inventory
- **Sales Orders**: Complete order processing with coupons and taxes
- **Customer Management**: Customer accounts and payment history

#### ⚙️ Workflow Automation
- **Process Management**: Custom user-defined workflows
- **Processing Queues**: Asynchronous task management
- **Status Tracking**: Workflow status and reminder systems
- **Affiliate Management**: Affiliate types and status tracking

#### 👥 CRM Features
- **Customer Database**: Comprehensive customer information management
- **Communication Threads**: Comments and interaction tracking
- **Folder Organization**: Document and data organization
- **Account Management**: User account and access control

## 🛠️ Technology Stack

- **Backend**: Laravel 11 (PHP 8.2+)
- **API**: RESTful API with Laravel Sanctum authentication
- **Database**: MySQL/PostgreSQL with 35+ entities
- **Frontend**: Vite, Tailwind CSS, Alpine.js
- **Architecture**: Monolithic API-first design
- **Authentication**: Token-based (Bearer tokens)

## 📋 Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js & npm
- MySQL/PostgreSQL database

## 🚀 Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd CRMSMUSKAN
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment Configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

   Configure your database and other settings in `.env`

5. **Database Setup**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Build Assets**
   ```bash
   npm run build
   # or for development
   npm run dev
   ```

7. **Start the Application**
   ```bash
   php artisan serve
   ```

## 📖 API Usage

### Authentication

```bash
# Register new user
POST /api/signup
{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password123"
}

# Login
POST /api/login
{
  "email": "john@example.com",
  "password": "password123"
}

# Response includes Bearer token for subsequent requests
```

### Protected Endpoints

All business endpoints require authentication:

```bash
Authorization: Bearer {your-token-here}
```

### Key API Resources

- `GET/POST/PUT/DELETE /api/creditors` - Manage creditors
- `GET/POST/PUT/DELETE /api/disputereasons` - Dispute reason management
- `GET/POST/PUT/DELETE /api/invoices` - Invoice operations
- `GET/POST/PUT/DELETE /api/saleorders` - Sales order management
- `GET/POST/PUT/DELETE /api/processes` - Workflow processes
- `GET/POST/PUT/DELETE /api/processingqueues` - Queue management

## 🏗️ Architecture Overview

### Database Schema
- **35+ Models** with complex relationships
- **User-centric design** - Most entities tied to user ownership
- **Multi-domain integration** - Credit, finance, and e-commerce in one system
- **Queue-based processing** - Asynchronous workflow execution

### Key Workflows

1. **Credit Dispute Process**:
   - Select creditor → Choose dispute reason → Apply instruction template → Generate letter

2. **E-Commerce Transaction**:
   - Product selection → Apply coupons/taxes → Generate invoice → Process payment

3. **Financial Operations**:
   - Create purchase order → Receive bill → Track payments → Reconciliation

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 📞 Support

For support, email support@cr-msmuskan.com or create an issue in this repository.

---

**Built with ❤️ using Laravel**
