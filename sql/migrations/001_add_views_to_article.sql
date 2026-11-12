-- Migration 001 : ajout du nombre de vues sur les articles
ALTER TABLE article ADD COLUMN views INT UNSIGNED NOT NULL DEFAULT 0;