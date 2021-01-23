<template>
  <div class="upload-section-component">
    <img v-if="!!imageDataName" :src="imageDataUrl" class="base-image-input mb-3" />
    {{ imageDataName && imageDataName}}
    <label
      for="image"
      class="col-form-label upload-label-child"
    >
      <div class="upload-image-button">画像を選択</div>
      <input
        type="file"
        accept="image/*"
        class="image-input"
        id="image"
        name="image"
        @input="getImageInfo"
      />
    </label>
  </div>
</template>

<script>
export default {
  data() {
    return {
      imageDataName: null,
      imageDataUrl: null
    };
  },
  methods: {
    getImageInfo(e) {
      // 画像読み込み＆画像がアップロードされたかのチェック
      const files = e.target.files;
      const file = files && files[0];
      if (file) {
        //  画像の名前読み込み
        this.imageDataName = file.name;
        const reader = new FileReader();
        reader.onload = e => {
          //  画像のデータ読み込み
          this.imageDataUrl = e.target.result;
        };
        reader.readAsDataURL(file);
      }
    }
  }
};
</script>
