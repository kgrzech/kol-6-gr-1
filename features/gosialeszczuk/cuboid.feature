Feature: Obliczenia

  Scenario: Objętość prostopadłościanu
    Given I am on homepage
    When I follow "Objętość prostopadłościanu by gosialeszczuk"
    And I fill in "A" with "3"
    And I fill in "B" with "4"
    And I fill in "C" with "5"
    And I press "Oblicz"
    Then I should see "Wynik wynosi: 60"