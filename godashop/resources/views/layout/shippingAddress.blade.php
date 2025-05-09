<div class="row">
    <div class="form-group col-sm-6">
        <input type="text" value="{{ Auth()->user()->shipping_name }}" class="form-control" name="fullname" placeholder="Họ và tên" required="" oninvalid="this.setCustomValidity('Vui lòng nhập tên của bạn')" oninput="this.setCustomValidity('')">
    </div>
    <div class="form-group col-sm-6">
        <input type="tel" value="{{ Auth()->user()->shipping_mobile }}" class="form-control" name="mobile" placeholder="Số điện thoại" required="" pattern="[0][0-9]{9,}" oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại bắt đầu bằng số 0 và ít nhất 9 con số theo sau')" oninput="this.setCustomValidity('')">
    </div>
    <div class="form-group col-sm-4">
        <select name="province" class="form-control province" required="" oninvalid="this.setCustomValidity('Vui lòng chọn Tỉnh / thành phố')" oninput="this.setCustomValidity('')">
            <option value="">Tỉnh / thành phố</option>
            @foreach ($provinces as $province)
                <option {{ $province->id == $selected_province_id ? 'selected' : '' }} value="{{ $province->id }}">{{ $province->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-4">
        <select name="district" class="form-control district" required="" oninvalid="this.setCustomValidity('Vui lòng chọn Quận / huyện')" oninput="this.setCustomValidity('')">
            <option value="">Quận / huyện</option>
            @foreach ($districts as $district)
                <option {{ $district->id == $selected_district_id ? 'selected' : '' }} value="{{ $district->id }}">{{ $district->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-4">
        <select name="ward" class="form-control ward" required="" oninvalid="this.setCustomValidity('Vui lòng chọn Phường / xã')" oninput="this.setCustomValidity('')">
            <option value="">Phường / xã</option>
            @foreach ($wards as $ward)
                <option {{ $ward->id == $selected_ward_id ? 'selected' : '' }} value="{{ $ward->id }}">{{ $ward->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-sm-12">
        <input type="text" value="{{ Auth()->user()->housenumber_street }}" class="form-control" placeholder="Địa chỉ" name="address" required="" oninvalid="this.setCustomValidity('Vui lòng nhập địa chỉ bao gồm số nhà, tên đường')" oninput="this.setCustomValidity('')">
    </div>
</div>
