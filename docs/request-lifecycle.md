# Request lifecycle — GET /admin/products

Browser gui GET /admin/products
    -> public/index.php (Front Controller)
    -> bootstrap ung dung + middleware
    -> routes/web.php khop URI /admin/products voi name admin.products.index
    -> ProductController@index duoc goi
    -> controller return view('admin.products')
    -> Laravel render Blade thanh HTML
    -> HTML tra ve browser