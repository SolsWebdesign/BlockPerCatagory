# BlockPerCatagory
An M2 extension that allows blocks on product pages if the product belongs to a certain category or subcategory

### Installation
Use the following commands to install this module into Magento 2:

    composer require sols/module-block-per-category
    bin/magento module:enable Sols_BlockPerCategory
    bin/magento setup:upgrade
    bin/magento setup:di:compile

### Usage
After install go to Stores -> Configuration -> Catalog -> Catalog -> Block per category 
and set Enabled to yes if needed.

Create a simple block under Content -> Elements -> Blocks and note the (numerical) id. 
Go to Catalog -> Sols -> Blocks per Category and press "Add Item". Enter a Name 
(for instance "USPs for mens wear") and the Block Id and the Category Id for which you would like 
to display the block on the product page. Press Save.

### An example
Block with id 20 contains 3 USPs (Unique selling points) to be displayed on men's wear. The main category 
under Catalog -> Categories for Men's wear has id 11. The entry under Catalog -> Sols -> Blocks per Category 
will be Name "USPs for mens wear", Block id 20, Category id 11. 

On the frontend all products displayed in Category id 11 and it's child categories will have the extra block 
containing the 3 USPs for men's wear. The block will be displayed just below the Add-to-wish-list, 
add-to-compare and email links.

### Debug

Sometimes it is hard to understand why a block is not displayed on a certain product page. For this there is 
an extra option under Stores -> Configuration -> Catalog -> Catalog -> Block per category called 
"Show category ids for debugging purposes" which is set "No" in default. Please only use in a staging environment 
because this setting will show on all(!) product pages on the frontend when enabled.

But it can be useful. Set to yes, clear cache(!) and go to the product page that does not display the wanted block and you will 
find an array containing the category ids like so:

    array(5) {
      [0]=>
      string(1) "1"
      [1]=>
      string(1) "2"
      [2]=>
      string(2) "11"
      [3]=>
      string(2) "12"
      [4]=>
      string(2) "14"
    }
    
This array can be empty! Then the product (for instance displayed on the home page!) does not descend from 
a category!

It is also possible that 2 blocks compete on a product page because both blocks are found in the 
Block per Category grid for different categories that the product descends from. In this case only one 
will be shown, "the first up".

E.g. if product x descends from 5 categories (14, 12, 11, 2 and 1 as shown above) and 2 blocks are defined as 
follows:

    Mens wear USPs   block_id 20 category_id 11
    Mens socks USPs  block_id 24 category_id 14

Then the first up would be category 14 and so the "Mens socks USPs" with block_id 24 would be shown on the 
product page of product x. This ensures a cascading effect but may make it a bit hard to understand which block 
should be displayed.
