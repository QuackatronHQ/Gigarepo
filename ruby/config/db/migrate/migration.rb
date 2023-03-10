class SomeMigration < ActiveRecord::Migration
  def change
    add_column :table, :column, :integer, index: true
  end
end
