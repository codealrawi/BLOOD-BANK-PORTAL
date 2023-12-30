# Blood Bank Portal

## Introduction
The Blood Bank Portal is a Python-based web application designed to manage and facilitate blood donation activities. This portal provides a platform for donors to register, administrators to manage donor information, and recipients to request blood donations.

## Features
- User authentication: Donors, administrators, and recipients can create accounts and log in securely.
- Donor management: Admins can view, add, edit, and delete donor information.
- Blood donation requests: Recipients can submit requests for blood donations, specifying blood type and quantity needed.
- Notification system: Donors and recipients receive notifications for successful blood donations or when a donation request is made.

## Technologies Used
- Python
- Flask (Web framework)
- HTML/CSS
- SQLite (Database)

##Setup Instructions
1. Clone the repository:
   ```bash
   git clone https://github.com/codealrawi/blood-bank-portal.git
   cd blood-bank-portal

##Install dependencies:
```bash
pip install -r requirements.txt
```
Set up the database:
```bash
python manage.py db upgrade
```
Run the application:
```bash
python run.py
```
Access the portal at http://localhost:5000.

##Usage
- Visit the portal and register for an account.
- Log in with your credentials.
- Donors can view and manage their profiles, while administrators can manage donor information and recipients can submit blood donation requests.
- Receive notifications for successful donations or donation requests.

##Contributing
If you'd like to contribute to the project, please follow these steps:
- Fork the repository.
- Create a new branch for your feature or bug fix.
- Make your changes and commit them.
- Push your branch to your fork.
- Submit a pull request to the main repository.

##Contact
For any questions or inquiries, please contact support@alrawi.ru.
