import React, { useRef } from "react";
import { useGLTF } from "@react-three/drei";
import { GroupProps, useFrame } from "@react-three/fiber";
import * as THREE from "three";
import { GLTF } from "three/examples/jsm/Addons.js";

type GLTFResult = GLTF & {
  nodes: {
    Object_4: THREE.Mesh;
  };
  materials: {
    Material: THREE.Material;
  };
};

type CeluritProps = GroupProps & {
  isHovered: boolean;
}

const Celurit: React.FC<CeluritProps> = (props: CeluritProps) => {
  const { nodes, materials } = useGLTF(
    "/3D/celurit.glb"
  ) as unknown as GLTFResult;
  const meshRef = useRef<THREE.Mesh>();
  const { isHovered } = props;

  useFrame(() => {
    if (meshRef.current) {
      const targetScale = isHovered ? 4.1 : 4;
      meshRef.current.scale.x += (targetScale - meshRef.current.scale.x) * 0.1;
      meshRef.current.scale.y += (targetScale - meshRef.current.scale.y) * 0.1;
      meshRef.current.scale.z += (targetScale - meshRef.current.scale.z) * 0.1;
      meshRef.current.rotation.y += isHovered ? 0.05 : 0.01;
    }
  });

  return (
    <group {...props} dispose={null}>
      <group rotation={[-Math.PI / 2, 0, 0]}>
        <mesh
          position={[0, 0, 0]}
          geometry={nodes.Object_4.geometry}
          material={materials.Material}
          scale={0.053}
        />
      </group>
    </group>
  );
};

useGLTF.preload("/3D/celurit.glb");

export default Celurit;
