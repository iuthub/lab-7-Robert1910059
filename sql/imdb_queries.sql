SELECT * FROM movies WHERE year = 1995;
SELECT count(*) FROM roles r JOIN actors a ON a.id = r.actor_id JOIN movies m ON m.id = r.movie_id WHERE m.name="Lost in Translation";
SELECT a.first_name FROM actors a JOIN roles r ON r.actor_id=a.id JOIN movies m ON m.id = r.movie_id WHERE m.name="Lost in Translation";
SELECT d.first_name FROM directors d JOIN movies_directors md ON md.director_id = d.id JOIN movies m ON m.id = md.movie_id WHERE m.name = "Fight Club";
SELECT count(m.id) FROM movies m JOIN movies_directors md ON md.movie_id=m.id JOIN directors d ON d.id=md.director_id WHERE d.first_name='Clint' and d.last_name='Eastwood';
SELECT m.name FROM movies m JOIN movies_directors md ON md.movie_id=m.id JOIN directors d ON d.id=md.director_id WHERE d.first_name='Clint' and d.last_name='Eastwood';
SELECT d.first_name FROM directors d JOIN movies_directors md ON md.director_id=d.id JOIN movies m ON m.id=md.movie_id JOIN movies_genres mg ON mg.movie_id=m.id WHERE mg.genre="horror";
SELECT a.first_name FROM actors a JOIN roles r ON a.id=r.actor_id JOIN movies m ON r.movie_id=m.id JOIN movies_directors md ON md.movie_id=m.id JOIN directors d ON d.id=md.director_id WHERE d.first_name='Christopher' AND d.last_name='Nolan';