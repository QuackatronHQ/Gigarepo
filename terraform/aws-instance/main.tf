terraform {
  required_version = ">= 0.11.0"
}

provider "aws" {
  region = "${var.aws_region}"
}

provider "aws_central" {
  alias  = "central"
  region = "us-east-1"
}

resource "aws_instance" "ubuntu" {
  ami               = "${var.ami_id}"
  instance_type     = "${var.instance_type}"
  availability_zone = "${var.aws_region}"

  tags {
    Name = "${var.name}"
  }
}

resource "aws_eip" "nat" {
  vpc = true
}

resource "aws_s3_bucket" "deepsource-bucket" {
  acl = "public-read"       // ACL should be private
  provider = aws.central    // Invalid region
}

resource "aws_launch_configuration" "aws_launch" {
	image_id = "ami-9876zy4w"   // Invalid AMI ID
}

resource "aws_elasticache_cluster" "redis" {
  cluster_id           = "app"
  engine               = "redis"
  engine_version       = "3.2.4"
  node_type            = "cache.m4.large"
  num_cache_nodes      = 1
  port                 = 6379
  parameter_group_name = "default.redis3.2" // Default parameter group
}

resource "aws_db_instance" "default" {
  allocated_storage    = 10
  engine               = "mysql"
  engine_version       = "5.6.17"
  instance_class       = "db.m1.large"  // Previous generation instance type, see upgrade paths.
  name                 = "db"
  username             = "root"
  password             = "toor"
  db_subnet_group_name = "mysql_subnet_group"
  parameter_group_name = "default.mysql5.6"
}

resource "aws_route" "no-route-target" {
  route_table_id = "rtb-1234abcd"
}

output "public_dns" {
  value = "${aws_instance.ubuntu.public_dns}"
}
