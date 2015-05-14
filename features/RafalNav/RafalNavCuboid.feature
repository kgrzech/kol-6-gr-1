Feature: Obliczenia RafalNav

  Scenario: Cuboid RafalNav
    Given I am on homepage
    When I follow "Pole prostopadloscianu by RafalNav"
    And I fill in "A" with "2"
    And I fill in "B" with "2"
    And I fill in "H" with "2"
    And I press "Oblicz"
   Then I should see "Wynik wynosi: 8"