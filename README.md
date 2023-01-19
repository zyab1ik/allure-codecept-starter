# How to use

#### Preparation:
1. Install composer and run `composer install` in the root directory of this project.
2. Download and install Chrome browser & chromeDriver from https://sites.google.com/a/chromium.org/chromedriver/downloads and put it in the root directory of this project.
3. Run chromeDriver with `./chromedriver --url-base=/wd/hub` in the root directory of this project.

#### Run:
1. Run all tests: `composer codecept-clean && composer codecept-run`
2. Run Acceptance tests: `composer codecept-clean && composer codecept-run acceptance`
3. Run Manual tests: `composer codecept-clean && composer codecept-run manual`
4. Run Unit tests: `composer codecept-clean && composer codecept-run unit`
5. Run Api tests: `composer codecept-clean && composer codecept-run api`

##### Report:
Report will be generated in the `tests/_output` directory. 
You can download the report from the `tests/_output` directory and open it in your allure report instance.

The report should look like this (one of the test case is failed):
![Report with all cases](docs/images/Screenshot%202023-01-19%20at%205.01.14%20PM.png)

Also, you can find example of manual test case in the `tests/acceptance/ManualTestCest.php` file. 
It is a simple test cases with a few steps which realised "test case as a code" approach.

Manual tests:
![Manual tests](docs/images/Screenshot%202023-01-19%20at%205.09.01%20PM.png)
Manual test case in progress:
![Manual tests launch](docs/images/Screenshot%202023-01-19%20at%206.32.45%20PM.png)
Acceptance tests:
![Acceptance tests](docs/images/Screenshot%202023-01-19%20at%205.13.21%20PM.png)

Api tests:
![Api tests](docs/images/Screenshot%202023-01-19%20at%205.14.04%20PM.png)
Thanks for reading!
