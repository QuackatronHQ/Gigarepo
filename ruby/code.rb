# frozen_string_literal: true

# Raises "bad ordering of magic comments"
# frozen_string_literal: true
# encoding: ascii

# Raises "use of deprecated BigDecimal.new"
<<<<<<< HEAD
a = { 'hello' => 'world', 'testing' => BigDecimal('123.456', 3) }
=======
a = { 'hello' => 'world', 'testing' => BigDecimal.new(123.456, 3) }





























>>>>>>> parent of eeb0afd (Format code with rubocop, gofmt, rustfmt, dotnet-format, isort, standardjs, gofumpt, prettier, yapf, standardrb, autopep8, php-cs-fixer, google-java-format and black)

# Raises "`while`/`until` detected in `begin` block"
begin
                                    do_something end while a == b

# Raises "multiple comparison detected"
x < y < z
10 <= x <= 20

# Raises "empty rescue block detected"
begin
  bar
rescue StandardError
end

# Raises "redundant `else`-clause detected"
if bar
else
end

# Raises "unused method arguments detected"
<<<<<<< HEAD
def some_method(_bar)
=======
def some_method(bar)
>>>>>>> parent of eeb0afd (Format code with rubocop, gofmt, rustfmt, dotnet-format, isort, standardjs, gofumpt, prettier, yapf, standardrb, autopep8, php-cs-fixer, google-java-format and black)
  puts 'Hello'
end

# Raises "unreachable code detected"
def some_method
  return
  do_something
end

# Raises "top level return with argument detected"
return 1

# Raises "duplicate elsif block detected"
if x == 1
  do_something
elsif x == 1
  do_something_else
end

# Raises "Deprecated way of initializing OpenSSL::Cipher and OpenSSL::Digest"
<<<<<<< HEAD
OpenSSL::Cipher.new('aes-128-gcm')
=======
OpenSSL::Cipher::AES.new(128, :GCM)
>>>>>>> parent of eeb0afd (Format code with rubocop, gofmt, rustfmt, dotnet-format, isort, standardjs, gofumpt, prettier, yapf, standardrb, autopep8, php-cs-fixer, google-java-format and black)

# Raises "put empty method definitions on a single line"
# Also raises "multiple methods with same name in the same scope" as we have a
# method with same name above
def some_method; end

# Raises "Invalid annotation keyword format detected"
def foo
  # TODO Replace this with bar
  do_something
end

# Raises "Use `Range#cover?` instead of `Range#include?`"
(1..9).include?(5)

my_hash = {}
# Raises "Hash merging can be replaced by hash key assignment"
my_hash.merge!('key': value)


# Raises "Use `size` instead of `count`"
[1, 2, 3].count
