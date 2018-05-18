Feature:


  Scenario: Swordsman vs brute
    Given that i have a strong "Swordsman"
    And  that I have a weak "Brute"
    When I simulate an attack
    Then first attack should be by a "Brute"
