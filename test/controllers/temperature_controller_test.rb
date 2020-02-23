require 'test_helper'

class TemperatureControllerTest < ActionController::TestCase
  setup do
    @temperatura = temperature(:one)
  end

  test "should get index" do
    get :index
    assert_response :success
    assert_not_nil assigns(:temperature)
  end

  test "should get new" do
    get :new
    assert_response :success
  end

  test "should create temperatura" do
    assert_difference('Temperatura.count') do
      post :create, temperatura: { created_on: @temperatura.created_on, orario: @temperatura.orario, temperatura: @temperatura.temperatura, umidita: @temperatura.umidita }
    end

    assert_redirected_to temperatura_path(assigns(:temperatura))
  end

  test "should show temperatura" do
    get :show, id: @temperatura
    assert_response :success
  end

  test "should get edit" do
    get :edit, id: @temperatura
    assert_response :success
  end

  test "should update temperatura" do
    patch :update, id: @temperatura, temperatura: { created_on: @temperatura.created_on, orario: @temperatura.orario, temperatura: @temperatura.temperatura, umidita: @temperatura.umidita }
    assert_redirected_to temperatura_path(assigns(:temperatura))
  end

  test "should destroy temperatura" do
    assert_difference('Temperatura.count', -1) do
      delete :destroy, id: @temperatura
    end

    assert_redirected_to temperature_path
  end
end
