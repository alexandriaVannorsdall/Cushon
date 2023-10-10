# Introduction
Cushon already has ISAs and pensions with employers who has an existing arrangement with them. Cushon now wishes
to offer the ability for individuals to open up ISAs without needing to be employed by someone who has an arrangement. 
Due to this, there will be separate spheres for businesses who have ISAs and pensions through Cushon and individuals
who came to Cushon on their own to open up an ISA account.

When customers wish to deposit they will be asked to select the amount from a list of available options. Currently,
they can only select one amount, but in the future they would like to expand this to allow for the customer to select 
multiple funds and allow for multiple areas to be selected to be able to deposit or invest. 

Once the customers transaction has been completed, this should be stored in the database to allow for it to be queried
in the future. 

**In this specific instance, we are assuming a user has 25,000 to deposit into a Cushon ISA account.**

### Brief and simplified example of the database design

![dbDesign](https://github.com/alexandriaVannorsdall/Cushon/assets/81317157/48e42289-9847-4d6c-85fc-10f47341f1b8)


### Assumptions
- Funds are only in GBP.
- Business and individual accounts are separate.
- Users have already been authenticated.
- That there is only one type of account an individual can opt into. 


#### Future Improvements
- Allow for multiple amounts to be deposited into a selected list of accounts not just one account in one transaction. 
- Track investments and/or transactions for the customers benefit. 
- If the users are not yet authenticated then they must be for security purposes. 
- I have created a CustomerController to edit the user using basic CRUD elements. This can be expanded on and utilized
if necessary. 
- Controller for funds could also be made if there is logic that is needing to be acted on in those
areas.

##### Models Created:
- Customer
- Accounts
- Funds
- Transactions

#### Controllers created:
- CustomerController (with basic CRUD)
- AccountsController (controls deposit logic)

#### Migrations created:
- Create customers table
- Create accounts tables
- Create funds table
- Create transaction table

#### Factories created:
- AccountsFactory
- CustomerFactory
- TransactionFactory


#### Notes
- I have decided to use Laravel for this task to mimic having a framework. Cushon does not use Laravel however, it is
similar to symfony and I have far more experience with Laravel and with time constraints it seems to make the most sense.
- I created a migration to create each table needed in the database (customers, accounts, funds, and transactions) and
a seeder to fill in the database with fake information. There are also factories that dictate what each table should 
hold.
- Then I created an AccountsController that will hold the logic of how to deposit funds into the account. Transactions
is how we will see when an account has been updated with a deposit. 
- I have created an AccountsControllerTest to test the deposit method in the AccountsController. 

#### Commands used:
- php artisan test - to run all the tests
- php artisan make:controller - to create new controllers
- php artisan make:model - to create a new model
- php artisan make:migration - to create a new migration
- php artisan make:seeder - to create a new seeder
- php artisan make:factory - to create a new factory
- php artisan db:seed - to run all the seeders
- php artisan migrate - to run all the migrations
