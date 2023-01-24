#include <set>
#include <string>
#include <vector>
#include <algorithm>

class EmployeeDetails {
public:
  EmployeeDetails() {}
  EmployeeDetails(std::string name) : name(name){};
  EmployeeDetails(const EmployeeDetails &);
  bool operator==(const EmployeeDetails &) const;
  // bool operator<(const EmployeeDetails &) const;
  std::string name;
  int id;
};

void add_details(std::vector<std::string> employee_names) {
  std::vector<EmployeeDetails> work_exp;
  // Do work_exp.reserve(employee_names.size());
  // work_exp.reserve(employee_names.size());
  for (const auto& name : employee_names)
    work_exp.push_back(EmployeeDetails(name));
}

bool employee_exist(std::vector<EmployeeDetails> employee_details,
                    std::string employee_name) {
  // use auto& to avoid copy of employee_details
  for (const auto employee_detail : employee_details)
    if (employee_name.compare(employee_detail.name))
      return true;

  return false;
}

bool record_exist(std::set<EmployeeDetails> records, EmployeeDetails e) {
  // rather use records.find(e) != records.end();
  return std::find(records.begin(), records.end(), e) != records.end();
}
