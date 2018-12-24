# Graphql testing Module for Magento 2.3

*Use case:* (PickUpFromStore)
We have Brick and Mortar Stores we need graphql endpoint

##### :exclamation: The Code is not for a **production server** it is only **proof of concept** imeplementation :exclamation: 

## Features
- Create new Table with Declarative Schema
- Use Data Patch to import Sample Data
- Implement own graphql endpoint 

## How to install
```bash
composer config repositories.barcamp.module-graphl vcs git@github.com:larsroettig/Barcamp_Graphl.git
composer require barcamp/module-graphl
bin/magento setup:up
```
## Requirements
- Magento 2.3
- php7.1


## Possibly Query (https://your_domain.test/graphql)

![GraphQL_Playground](https://github.com/larsroettig/Barcamp_Graphl/blob/master/doc/GraphQL_Playground.png)

```graphql 
{
  pickUpStores {
    total_count
      items {
        name
        street
        street_num
        postcode
      }
  }
}
```

