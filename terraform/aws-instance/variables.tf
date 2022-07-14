variable "aws_region" {
  description = "AWS region"
  default = "eu-west-1"
}

variable "ami_id" {
  description = "AMI's ID to provision"
  default = "ami-2e1ef954"
}

variable "instance_type" {
  description = "EC2 instance type to provision"
  default = "t2.micro"
}

variable "name" {
  description = "Name Tag"
  default = "Provisioned by Terraform"
}


