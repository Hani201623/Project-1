#!/bin/bash
BASE="http://localhost/api"
TOKEN="DEMO_TOKEN_123"

echo "Login:"
curl -s -X POST "$BASE/auth_login.php" -H "Content-Type: application/json" -d '{"username":"demo","password":"password"}'
echo -e "\n\nWho am I (auth):"
curl -s "$BASE/auth_me.php" -H "Authorization: Bearer $TOKEN"

echo -e "\n\nCreate category:"
curl -s -X POST "$BASE/categories_post.php" -H "Authorization: Bearer $TOKEN" -H "Content-Type: application/json" -d '{"name":"Beverages"}'

echo -e "\n\nList categories:"
curl -s "$BASE/categories_get.php"

echo -e "\n\nCreate item:"
curl -s -X POST "$BASE/items_post.php" -H "Authorization: Bearer $TOKEN" -H "Content-Type: application/json" -d '{"name":"Cola","sku":"SKU001","qty":10,"price":1.99,"category_id":1}'

echo -e "\n\nList items:"
curl -s "$BASE/items_get.php"

echo -e "\n\nUpdate item:"
curl -s -X PUT "$BASE/items_put.php?id=1" -H "Authorization: Bearer $TOKEN" -H "Content-Type: application/json" -d '{"qty":25,"price":2.49}'

echo -e "\n\nDelete item:"
curl -s -X DELETE "$BASE/items_delete.php?id=1" -H "Authorization: Bearer $TOKEN"
echo -e "\n\nDone."
