Feature: Poste
  As an admin I need to be able to CRUD a Poste.

  Scenario: I can see Poste Homepage & Add Poste button
    Given I am logged in as "admin"
    When I go to "/personne/poste"
    Then the response status code should be 200
    Then I should see "Liste des Postes"
    And I should see "Ajouter un poste"


  Scenario: I can create a new Poste
    Given I am logged in as "admin"
    When I go to "/personne/poste/add"
    Then the response status code should be 200
    When I fill in "Intitule" with "R. Informatique"
    And I fill in "Description" with "Code & Architecture"
    And I press "Valider"
    Then the url should match "/personne/poste"
    And I should see "Poste ajouté"
    And I should see "R. Informatique"

  Scenario: I can edit a Poste
    Given I am logged in as "admin"
    When I go to "/personne/poste/modifier/1"
    Then the response status code should be 200
    When I fill in "Intitule" with "Responsable Tests"
    And I press "Valider"
    Then the url should match "/personne/poste"
    And I should see "Poste modifié"
    And I should see "Responsable Tests"

  Scenario: I can delete a Poste
    Given I am logged in as "admin"
    When I go to "/personne/poste/modifier/1"
    Then the response status code should be 200
    And I press "Supprimer le poste"
    Then the url should match "/personne/poste"
    And I should see "Poste supprimé"
    And I should not see "Responsable Tests"
