Feature: Obliczenia

  Scenario: Objętość prostopadłościanu
    Given I am on homepage
    When I follow "Objętość prostopadłościanu by kamzor"
    And I fill in "A" with "1"
    And I fill in "B" with "2"
    And I fill in "C" with "3"
    And I press "Oblicz"
    Then I should see "Wynik wynosi: 6"