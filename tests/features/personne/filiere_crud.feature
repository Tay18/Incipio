Feature: Filiere
  As an admin I need to be able to CRUD a Filiere.

  Scenario: I can see Filiere Homepage & Add Filiere button
    Given I am logged in as "admin"
    When I go to "/personne/poste"
    Then the response status code should be 200
    Then I should see "Liste des Filières"
    And I should see "Ajouter une filière"


  Scenario: I can create a new Filiere
    Given I am logged in as "admin"
    When I go to "/personne/filiere/add"
    Then the response status code should be 200
    When I fill in "Nom" with "Mecanique"
    And I press "Valider"
    Then the url should match "/personne/poste"
    And I should see "Filière ajoutée"
    And I should see "Mecanique"

  Scenario: I can edit a Filiere
    Given I am logged in as "admin"
    When I go to "/personne/filiere/modifier/1"
    Then the response status code should be 200
    When I fill in "Nom" with "Testing science"
    And I press "Valider"
    Then the url should match "/personne/poste"
    And I should see "Filière modifiée"
    And I should see "Testing science"

  Scenario: I can delete a Poste
    Given I am logged in as "admin"
    When I go to "/personne/filiere/modifier/1"
    Then the response status code should be 200
    And I press "Supprimer la filière"
    Then the url should match "/personne/poste"
    And I should see "Filière supprimée"
    And I should not see "Testing science"
