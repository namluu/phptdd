Feature: Home Page
  In order to welcome visitors
  As a visitor
  I need to be able to see the website logo

  Scenario: See the website logo
    Given I have access to the home page URL
    When I visit the home page
    Then I should see the website logo
