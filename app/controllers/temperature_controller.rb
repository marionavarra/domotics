class TemperatureController < ApplicationController
  before_action :set_temperatura, only: [:show, :edit, :update, :destroy]
  #after_commit :empty_file, on: :csv_read
  # GET /temperature
  # GET /temperature.json
  def index
    @temperature = Temperatura.all
  end

  # GET /temperature/1
  # GET /temperature/1.json
  def show
  end
  def last
    cmd = "cat /sys/devices/virtual/thermal/thermal_zone1/temp"
    @temperatura = Temperatura.last
    @cputemp = `#{cmd}`
    cmd = "ssh mario@127.0.0.1 -i /home/mario/.ssh/id_rsa -p2222 'ps -ef |grep motion|grep -v grep'"
    @motion = `#{cmd}`
    respond_to do |format|
     format.html { render :show }
     format.json { render :show }
    end
  end

  def last_month
    temperature = Temperatura.where("orario >= ?", Date.today.last_month)
    @dati = ""
    i=0
    t_media = 0
    u_media = 0
    orario = 0
    temperature.each do |t|
      if i==5
        @dati = @dati + '["' + I18n.localize(orario, format: '%d%b') + '", ' +  ((u_media +t.umidita)/6).to_s + ", " +((t_media + t.temperatura)/6).to_s + "],\n"
        i=0
        t_media = 0
        u_media = 0
        else
          t_media += t.temperatura
          u_media += t.umidita
          orario = t.orario if i==2
          i+=1
      end
    end
    @dati = @dati.chop.chop
  end
  def last_year
    temperature = Temperatura.where("orario >= ?", Date.today.last_year)
    @dati = ""
    i=0
    t_media = 0
    u_media = 0
    orario = 0
    temperature.each do |t|
      if i==33
        @dati = @dati + '["' + I18n.localize(orario, format: '%d%b') + '", ' +((t_media + t.temperatura)/34).to_s + "],\n"
        i=0
        t_media = 0
        u_media = 0
      else
        t_media += t.temperatura
        u_media += t.umidita
        orario = t.orario if i==2
        i+=1
      end
    end
    @dati = @dati.chop.chop
  end
  def last_week
    temperature = Temperatura.where("orario >= ?", Date.today.last_week)
    @dati = ""
    temperature.each do |t|

      @dati = @dati + '["' + I18n.localize(t.orario, format: '%a%d') + '", ' +  t.umidita.to_s + ", " +t.temperatura.to_s + "],\n"
    end
    @dati = @dati.chop.chop
  end
  def last_day
    temperature = Temperatura.where("orario >= ?", Date.yesterday)
    @dati = ""
    temperature.each do |t|
      @dati = @dati + '["' +  I18n.localize(t.orario, format: '%H:%M') + '", ' +  t.umidita.to_s + ", " +t.temperatura.to_s + "],\n"
    end
    @dati = @dati.chop.chop
  end

  # GET /temperature/new
  def new
    @temperatura = Temperatura.new
  end

  # GET /temperature/1/edit
  def edit
  end

  # POST /temperature
  # POST /temperature.json
  def create
    @temperatura = Temperatura.new(temperatura_params)

    respond_to do |format|
      if @temperatura.save
        format.html { redirect_to @temperatura, notice: 'Temperatura was successfully created.' }
        format.json { render :show, status: :created, location: @temperatura }
      else
        format.html { render :new }
        format.json { render json: @temperatura.errors, status: :unprocessable_entity }
      end
    end
  end
  def csv_read
    file = File.open(Rails.root.join('public').to_s + "/umidita_temperatura.csv", "r")
    #Temperatura.transaction do
      file.each_line do |line|
        temperatura = Temperatura.new
        rilevazione = line.split(",")
        temperatura.orario = rilevazione[0]
        temperatura.umidita = rilevazione[1]
        temperatura.temperatura = rilevazione[2]
        temperatura.save
      end
    #empty_file#end
    file.close
    respond_to do |format|
        format.html { redirect_to temperature_url, notice: 'File loaded.' }
    end
  end
  def empty_file
    file = File.open(Rails.root.join('public').to_s + "/umidita_temperatura.csv", "w")
    content= ""
    file.write(content)
    file.close
  end
  # PATCH/PUT /temperature/1
  # PATCH/PUT /temperature/1.json
  def update
    respond_to do |format|
      if @temperatura.update(temperatura_params)
        format.html { redirect_to @temperatura, notice: 'Temperatura was successfully updated.' }
        format.json { render :show, status: :ok, location: @temperatura }
      else
        format.html { render :edit }
        format.json { render json: @temperatura.errors, status: :unprocessable_entity }
      end
    end
  end

  # DELETE /temperature/1
  # DELETE /temperature/1.json
  def destroy
    @temperatura.destroy
    respond_to do |format|
      format.html { redirect_to temperature_url, notice: 'Temperatura was successfully destroyed.' }
      format.json { head :no_content }
    end
  end

  private
    # Use callbacks to share common setup or constraints between actions.
    def set_temperatura
      @temperatura = Temperatura.find(params[:id])
    end

    # Never trust parameters from the scary internet, only allow the white list through.
    def temperatura_params
      params.require(:temperatura).permit(:orario, :umidita, :temperatura, :created_on)
    end
end
