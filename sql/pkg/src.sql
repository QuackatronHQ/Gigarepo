\unset show_times

USE defaultdb;
CREATE TABLE test(s STRING);

\set echo
INSERT INTO test(s) VALUES ('hello'), ('world');
SELECT * FROM test;

SELECT undefined;

SELECT 'unseen';
Footer

INSERT INTO mnop (m, n) SELECT i, (1e9 + i/2e4)::float FROM generate_series(1, 2e4) AS i(i) RETURNING NOTHING

select '[1, "a", true, null, {"c": "blah", "d": []}]':::JSON, '{"\n": ["\""], "\"": "\\"}'::JSONB

select * from
   generate_series(a), -- a simple scalar expression
   rows from(generate_series(b)), -- a rows from clause that can be elided
   rows from(generate_series(a), generate_series(b)) -- this one not


select a and (b or c) and d,
  a or (b and c) or d

SELECT NULL AS TABLE_CAT,
       n.nspname AS TABLE_SCHEM,
       ct.relname AS TABLE_NAME,
       a.attname AS COLUMN_NAME,
       (i.keys).n AS KEY_SEQ,
       ci.relname AS PK_NAME
    FROM pg_catalog.pg_class ct
    JOIN pg_catalog.pg_attribute a ON (ct.oid = a.attrelid)
    JOIN pg_catalog.pg_namespace n ON (ct.relnamespace = n.oid)
    JOIN (SELECT i.indexrelid,
                 i.indrelid,
             i.indisprimary,
             information_schema._pg_expandarray(i.indkey) AS keys
        FROM pg_catalog.pg_index i) i ON (a.attnum = (i.keys).x AND a.attrelid = i.indrelid)
    JOIN pg_catalog.pg_class ci ON (ci.oid = i.indexrelid)
   WHERE true AND ct.relname = 'j' AND i.indisprimary
ORDER BY table_name, pk_name, key_seq
