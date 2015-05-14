Feature: Obliczenia

  Scenario: Objetosc prostopadloscianu
    Given I am on homepage
    When I follow "Objetosc prostopadloscianu by kzolnierz"
    And I fill in "a" with "5"
    And I fill in "b" with "4"
    And I fill in "c" with "3"
    And I press "Oblicz"
    Then I should see "Wynik wynosi 60"