Feature: Obliczenia

  Scenario: Objętość prostopadłościanu
    Given I am on homepage
    When I follow "Cuboid - Nosek Adrian"
    And I fill in "A" with "2"
    And I fill in "B" with "3"
    And I fill in "C" with "4"
    And I press "Oblicz"
    Then I should see "Wynik wynosi: 24"