test-password-checker
=====================

Votre objectif est de créer une API pour vérifier la validité des mots de passe.

Les mots de passe doivent répondre à plusieurs critères (taille minimale, mélange de types, etc.) et nous voulons que chaque critère soit vérifié par une classe dédiée.

1. Ecrire une interface `AppBundle\PasswordChecker\PasswordCheckerInterface` qui permette d'implémenter d'autres classes comme `AppBundle\PasswordChecker\MinSizeChecker`.
1. Ecrire une classe `AppBundle\PasswordChecker\AsciiChecker` qui implémente `AppBundle\PasswordChecker\PasswordCheckerInterface` et qui vérifie que le mot de passe ne contient que des caractères ASCII.
1. Ecrire une classe `AppBundle\PasswordChecker\AnagramChecker` qui implémente `AppBundle\PasswordChecker\PasswordCheckerInterface` et qui vérifie que le mot de passe n'est pas un anagramme de "password".
1. Modifier `AppBundle\Service\PasswordChecker` pour qu'il utilise les 2 nouvelles classes.
1. On voudrait pouvoir étendre le système à un grand nombre de checkers et pouvoir activer/désactiver des checkers par configuration. Proposer une solution.
1. Quels composants standards de Symfony pourrait-on utiliser pour améliorer ou simplifier ce projet ? Vous pouvez utiliser ce README pour noter votre réponse.

**Réponse question 5 AlexM**
- Avec le tags qui sont actuellement utilisés dans le config.yml pour « activer » ou non un checker, et étant donné que ces checkers pourraient être de plus en plus en nombreux, le composant « Config » permettrait de charger, modifier, contrôler la valeur des différents paramètres plus efficacement.
- On a recours à l’injection de dépendance dans le constructeur de la classe PasswordChecker. Le composant DependencyInjection nous permettrait par exemple de déterminer dans le container quelles classes sont contenues dans cette injection de dépendances.
- Le composant Guard permet de gérer différents niveaux d'identification à une application, ce qui pourrait être utile si l'on souhaite fermer l'accès à notre API à certains utilisateurs.


