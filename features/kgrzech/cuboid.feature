Feature: Obliczenia

  Scenario: Objętość prostopadłościanu
    Given I am on homepage
    When I follow "Objętość prostopadłościanu by kgrzech"
    And I fill in "A" with "3"
    And I fill in "B" with "3"
    And I fill in "C" with "2"
    And I press "Oblicz"
    Then I should see "Wynik wynosi: 18"