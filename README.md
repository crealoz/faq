# faq
A Magento 2 module meant to be used in teaching purposes

## Installation

### Composer

First, you need to add GitHub repository to your composer.json file. You can do it adding the following lines :

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/crealoz/faq"
        }
    ],
    "require": {
        "crealoz/faq": "main"
    }
}
```

Then, you can install the module with the following command :

```bash
composer require crealoz/faq:main
```

### Module installation

Then, you need to enable the module with the following command :

```bash
bin/magento module:enable Crealoz_Faq
```

And finally, you need to upgrade the database with the following command :

```bash
bin/magento setup:upgrade
```
