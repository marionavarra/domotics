class CreateTemperaturas < ActiveRecord::Migration
  def change
    create_table :temperaturas do |t|
      t.decimal :umidita
      t.decimal :temperatura
      t.datetime :created_on

      t.timestamps null: false
    end
  end
end
