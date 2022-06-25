resource "aws_eip" "nat" {
  vpc = true
}

resource "aws_s3_bucket" "deepsource-bucket" {
  acl = "public-read"   // make it private
  provider = aws.central // invalid region
}

resource "aws_launch_configuration" "aws_launch" {
	image_id = "ami-9876zyxw"  # invalid AMI id
}

resource "aws_elasticache_cluster" "redis" {
  cluster_id           = "app"
  engine               = "redis"
  engine_version       = "3.2.4"
  node_type            = "cache.m4.large"
  num_cache_nodes      = 1
  port                 = 6379
  parameter_group_name = "default.redis3.2" // default parameter group
}

resource "aws_db_instance" "default" {
  allocated_storage    = 10
  engine               = "mysql"
  engine_version       = "5.6.17"
  instance_class       = "db.m1.large"  // previous generation instance type, see upgrade paths
  name                 = "db"
  username             = "root"
  password             = "toor"
  db_subnet_group_name = "mysql_subnet_group"
  parameter_group_name = "default.mysql5.6"
}
resource "aws_route" "no-rout-target" {
    route_table_id = "rtb-1234abcd"
}