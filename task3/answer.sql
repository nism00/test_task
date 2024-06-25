SELECT
    u.name,
    u.phone,
    COALESCE(SUM(o.subtotal), 0),
    COALESCE(AVG(subtotal), 0),
    DATE_FORMAT(MAX(o.created), '%d.%m.%Y')
FROM users u
    LEFT JOIN orders o ON o.user_id = u.id
GROUP BY u.id
