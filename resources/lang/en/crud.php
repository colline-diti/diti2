<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Full Name',
            'email' => 'Email',
            'password' => 'Password',
        ],
    ],

    'stock_tables' => [
        'name' => 'Stock Tables',
        'index_title' => 'Stock Table List',
        'new_title' => 'New Stock table',
        'create_title' => 'Create StockTable',
        'edit_title' => 'Edit StockTable',
        'show_title' => 'Show StockTable',
        'inputs' => [
            'item_name' => 'Item Name',
            'quantity' => 'Quantity In',
            'unit_id' => 'Unit',
            'item_category_id' => 'Item Category',           
            'remarks' => 'Remarks',
        ],
    ],

    'res_sales_tables' => [
        'name' => 'Res Sales Tables',
        'index_title' => 'ResSalesTables List',
        'new_title' => 'New Res sales table',
        'create_title' => 'Create ResSalesTable',
        'edit_title' => 'Edit ResSalesTable',
        'show_title' => 'Show ResSalesTable',
        'inputs' => [
            'product_name' => 'Product Name',
            'price' => 'Price',
            'res_product_id' => 'Res Product',
        ],
    ],

    'product_details' => [
        'name' => 'Product Details',
        'index_title' => 'ResProducts List',
        'new_title' => 'New Res product',
        'create_title' => 'Create ResProduct',
        'edit_title' => 'Edit ResProduct',
        'show_title' => 'Show ResProduct',
        'inputs' => [
            'product_name' => 'Product Name',
            'product_price' => 'Price',
            'res_category_id' => 'Product Category',
        ],
    ],

    'res_sections' => [
        'name' => 'Restuarant Sections',
        'index_title' => 'ResSections List',
        'new_title' => 'New Res section',
        'create_title' => 'Create ResSection',
        'edit_title' => 'Edit ResSection',
        'show_title' => 'Show ResSection',
        'inputs' => [
            'section_name' => 'Section Name',
            'description' => 'Description',
        ],
    ],

    'units' => [
        'name' => 'Item Unit',
        'index_title' => 'Item Unit List',
        'new_title' => 'New Item Units',
        'create_title' => 'Create Item Unit',
        'edit_title' => 'Edit Item Unit',
        'show_title' => 'Show Item Unit',
        'inputs' => [
            'unit_name' => 'Unit Name',
            'unit_description' => 'Description',
        ],
    ],


    'stock_discharges' => [
        'name' => 'Stock Discharges',
        'index_title' => 'Stock Discharges List',
        'new_title' => 'New Stock discharge',
        'create_title' => 'Create Stock Discharge',
        'edit_title' => 'Edit Stock Discharge',
        'show_title' => 'Show Stock Discharge',
        'inputs' => [
            'quantity_issued' => 'Quantity Issued',
            'stock_table_id' => 'Item',
            'unit_id' => 'Unit',
            'res_section_id' => 'Section',
            'return_date' => 'Return Date',
            'remarks' => 'Remarks',
            'issued_by' => 'Issued By',
            'user_id' => 'Recieved By',
        ],
    ],

    'resturant_categories' => [
        'name' => 'Resturant Categories',
        'index_title' => 'ResCategories List',
        'new_title' => 'New Res category',
        'create_title' => 'Create ResCategory',
        'edit_title' => 'Edit ResCategory',
        'show_title' => 'Show ResCategory',
        'inputs' => [
            'name' => 'Name',
            'description' => 'Description',
        ],
    ],

    'reciepts' => [
        'name' => 'Reciepts',
        'index_title' => 'Reciepts List',
        'new_title' => 'New Reciept',
        'create_title' => 'Create Reciept',
        'edit_title' => 'Edit Reciept',
        'show_title' => 'Show Reciept',
        'inputs' => [
            'quantity' => 'Quantity',
            'cash' => 'Cash',
            'change' => 'Change',
            'balance' => 'Balance',
            'total' => 'Total',
            'served_by' => 'Served By',
            'res_product_id' => 'Res Product',
        ],
    ],
    //creating Item Category under Stock management
    'item_categories' => [
        'name' => 'Item Categories',
        'index_title' => 'Category List',
        'new_title' => 'New Category',
        'create_title' => 'Create Category',
        'edit_title' => 'Edit Category',
        'show_title' => 'Show Category',
        'inputs' => [
            'name' => 'Name',
            'description' => 'Description',
            'stock_table_id' => 'Stock Table',
        ],
    ],

    //creating all Payment Types
    'all_payment_types' => [
        'name' => 'Payment Type',
        'index_title' => 'Payment Type List',
        'new_title' => 'New Payment Type',
        'create_title' => 'Create Payment Type',
        'edit_title' => 'Edit Payment Type',
        'show_title' => 'Show Payment Type',
        'inputs' => [
            'payment_name' => 'Name',
            'description' => 'Description',
        ],
    ],

    //creating all Payment Types
    'all_tax_rates' => [
        'name' => 'Tax Rates',
        'index_title' => 'Tax Rates List',
        'new_title' => 'New Tax Rate',
        'create_title' => 'Create Tax Rate',
        'edit_title' => 'Edit Tax Rate',
        'show_title' => 'Show Tax Rate',
        'inputs' => [
            'tax_name' => 'Name',
            'rate' => 'Rate',
        ],
    ],


        //Restaurant Requisitions Crud
    'restaurant_requisitions' => [
        'name' => 'Restuarant Requisitions',
        'index_title' => 'Restaurant Requisitions List',
        'new_title' => 'New Restaurant Requisitions',
        'create_title' => 'Create Restaurant Requisition',
        'edit_title' => 'Edit Restaurant Requisition',
        'show_title' => 'Show Restaurant Requisitions',
        'inputs' => [
            'requisition_code' => 'Requisition Code',
            'status' => 'Status',
            'delivery_status' => 'Delivery Status',
            'Particulars' => 'Description',
        ],
    ],

      //Item Requisitions Crud
      'requisition_items' => [
        'name' => 'Requisition Items',
        'index_title' => 'Requisition Items List',
        'new_title' => 'New Requisition Items',
        'create_title' => 'Create Requisition Items',
        'edit_title' => 'Edit Requisition Items',
        'show_title' => 'Show Requisition Items',
        'inputs' => [
            'name' => 'Name',
            'restaurant_requisition_id' => 'Requisition Identifier',
        ],
    ],

    //Requisition Delivery Crud
    'requisition_item_requisition_deliveries' => [
        'name' => 'Requisition Items',
        'index_title' => 'Requisition Items List',
        'new_title' => 'New Requisition Items',
        'create_title' => 'Create Requisition Items',
        'edit_title' => 'Edit Requisition Items',
        'show_title' => 'Show Requisition Items',
        'inputs' => [
            'requisition_item_id' => 'Item',
            'item_quantity' => 'Quantity',
            'delivery_date' => 'Delivery Date',
            'remarks'=> 'Remarks',
        ],
    ],


    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];
