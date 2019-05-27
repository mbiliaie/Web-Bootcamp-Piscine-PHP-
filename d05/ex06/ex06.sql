SELECT title, summary FROM film
WHERE lcase(summary) LIKE "%vincent%"
ORDER BY id_film;