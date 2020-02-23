class CreateTemperature < ActiveRecord::Migration
  def change
    create_table :temperature do |t|
      t.datetime :orario
      t.decimal :umidita
      t.decimal :temperatura
      t.datetime :created_on

      t.timestamps null: false
    end
  end
end
