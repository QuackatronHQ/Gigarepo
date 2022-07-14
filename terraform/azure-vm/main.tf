terraform {
  required_version = ">= 0.11.1"
}

variable "location" {
  description = "Azure location in which to create resources"
  default = "Central US"
}

variable "linux_dns_prefix" {
  description = "DNS prefix to add public IP address for Linux VM"
}

variable "admin_pass" {
  description = "Administrator password for Linux VM"
  default = "iamapassword"
}

module "linuxserver" {
  source              = "Azure/compute/azurerm"
  version             = "1.2.5"
  location            = "${var.location}"
  resource_group_name = "${var.linux_dns_prefix}"
  vm_hostname         = "deepsource"
  admin_password      = "${var.admin_pass}"
  vm_os_simple        = "LinuxServer"
  public_ip_dns       = ["${var.linux_dns_prefix}"]
  vnet_subnet_id      = "${module.network.vnet_subnets[0]}"
}

module "network" {
  source              = "Azure/network/azurerm"
  version             = "1.2.2"
  location            = "${var.location}"
  resource_group_name = "${var.linux_dns_prefix}"
  allow_ssh_traffic   = false
}

output "linux_vm_public_name"{
  value = "${module.linuxserver.public_ip_dns_name}"
}
