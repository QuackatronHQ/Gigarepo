terraform {
  required_version = ">= 0.15.1"
}

variable "gcp_project" {
  description = "GCP project name"
}

variable "gcp_region" {
  description = "GCP region"
  default = "us-west1"
}

variable "gcp_credentials" {
  description = "GCP credentials needed by Google provider"
}

provider "google" {
  credentials = "${var.gcp_credentials}"
  project     = "${var.gcp_project}"
  region      = "${var.gcp_region}"
}

variable "machine_type" {
  description = "GCP machine type"
  default = "n1-standard-1"
}

variable "instance_name" {
  description = "GCP instance name"
  default = "gcp_instance"
}

variable "image" {
  description = "Image to build instance from"
  default = "debian-cloud/debian-11"
}

variable "gcp_zone" {
  description = "GCP zone"
  default = "us-west1-b"
}

resource "google_compute_instance" "gcp" {
  name         = "${var.instance_name}"
  machine_type = "${var.machine_type}"
  zone         = "${var.gcp_zone}"

  boot_disk {
    initialize_params {
      image = "${var.image}"
    }
  }

  network_interface {
    network = "default"

    access_config {
    }
  }

}

output "external_ip"{
  value = "${google_compute_instance.gcp.network_interface.0.access_config.0.nat_ip}"
}
