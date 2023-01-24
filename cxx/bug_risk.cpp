#include <string>
#include <string_view>
#include <numeric>

std::string_view get_name(std::string first_name, std::string last_name)
{
  std::string_view full_name = first_name + " " + last_name;
  std::string_view view1 = std::string();
  return full_name;
}

class Base {
public:
  Base() = default;
  Base(const Base &) = default;

private:
  int a;
};

class Derived : public Base {
  // Consider calling base copy ctor: Derived(const Derived &other) : Base(other){}
  Derived(const Derived &other) {}
};

float foo(float a[100]) {
  // Possible loss of precision due the type-folding from `float` to `int`".
  // Replace last argument with 0.0
  return std::accumulate(a, a + 99, 0);
}
