Feature: Objetosc prostopadloscianu

  Scenario: Objetosc prostopadloscianu
    Given I am on homepage
    When I follow "Obliczanie objetosci prostopadloscianu by majdan"
    And I fill in "a" with "2"
    And I fill in "b" with "2"
    And I fill in "h" with "2"
    And I press "Oblicz"
    Then I should see "Wynik wynosi 8"
