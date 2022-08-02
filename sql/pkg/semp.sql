select
  (a + b) - c, (a - b) + c,  -- verify associativity at top
  a + (b - c), a - (b + c),  -- ditto
  ((a + b) - c) + d, ((a - b) + c) + d, -- veriffy associativity in sub-expr
  (a + (b - c)) + d, (a - (b + c)) + d, -- ditto
  ((a + b) - c) - d, ((a - b) + c) - d, -- ditto
  (a + (b - c)) - d, (a - (b + c)) - d, -- ditto
  d + ((a + b) - c), d + ((a - b) + c), -- ditto
  d + (a + (b - c)), d + (a - (b + c)), -- ditto
  d - ((a + b) - c), d - ((a - b) + c), -- ditto
  d - (a + (b - c)), d - (a - (b + c)), -- ditto
  ((a1/a2)/(b/c))/((d/e)/f),            -- ditto
  (a+b)*(c*d),                 -- mixed precedence
  a+(b*c), (a+b)*c             -- ditto


INSERT INTO mnop (m, n) SELECT i, (1e9 + i/2e4)::float FROM generate_series(1, 2e4) AS i(i) RETURNING NOTHING

CREATE TABLE midprimarykeyswapcleanup AS SELECT * FROM generate_series(1,3) AS a;
-- This schema change is used to enable the primary key swap. The backup is not taken during this schema change.
ALTER TABLE midprimarykeyswapcleanup ALTER COLUMN a SET NOT NULL;
ALTER TABLE midprimarykeyswapcleanup ALTER PRIMARY KEY USING COLUMNS (a);
BACKUP defaultdb.* TO 'nodelocal://1/midprimarykeyswapcleanup';
DROP TABLE midprimarykeyswapcleanup;
